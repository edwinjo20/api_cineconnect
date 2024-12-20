import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { HttpClient, HttpClientModule } from '@angular/common/http';

@Component({
    selector: 'app-login',
    standalone: true,
    imports: [CommonModule, FormsModule, HttpClientModule],
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.css'],
})
export class LoginComponent {
    email: string = '';
    password: string = '';
    private baseUrl = 'http://localhost:8000/login'; // Replace with your API

    constructor(private http: HttpClient) {}

    onLogin() {
        console.log(`Email: ${this.email}, Password: ${this.password}`);
        this.getData();
    }

    getData() {
        this.http.get(`${this.baseUrl}/endpoint`).subscribe(
            (data) => console.log('Data:', data),
            (error) => console.error('Error:', error)
        );
    }
}
