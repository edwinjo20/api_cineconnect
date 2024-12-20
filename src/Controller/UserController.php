<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/users', name: 'get_all_users', methods: ['GET'])]
    public function getAllUsers(EntityManagerInterface $entityManager): JsonResponse
    {
        // Fetch all users from the database
        $users = $entityManager->getRepository(Utilisateur::class)->findAll();

        // Map user data to a simplified array
        $userData = array_map(function (Utilisateur $user) {
            return [
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'role' => $user->getRole(),
            ];
        }, $users);

        return $this->json($userData);
    }
    #[Route('/users', name: 'create_user', methods: ['POST'])]
    public function createUser(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        $data = json_decode($request->getContent(), true);

        $user = new Utilisateur();
        $user->setEmail($data['email']);
        $user->setUsername($data['username']);
        $user->setRole($data['role']);

        $hashedPassword = $passwordHasher->hashPassword($user, $data['password']);
        $user->setPassword($hashedPassword);

        $entityManager->persist($user);
        $entityManager->flush();

        return new Response('User created successfully!', Response::HTTP_CREATED);
    }
}
