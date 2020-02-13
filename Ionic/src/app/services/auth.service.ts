import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  apiUrl: string ="http://localhost:8000/api/";

  httpHeaders: any ={
    headers:{
      'Content-Type': 'application/json',
      'Accept': 'apliccation/json',
      'Authorization': 'Bearer'
    }
  }

  constructor( public http: HttpClient ) { }


  loginUser(form): Observable<any> {
    return this.http.post(this.apiUrl + 'login', form, this.httpHeaders);
  }

  // logoutUser(){
  //   this.httpHeaders['headers']["Authorization"] = 'Bearer' + 'localStorage'.getItem('userToken');
  //   return this.http.get( this.apiUrl + 'logout', this.httpHeaders );
  // }
}
