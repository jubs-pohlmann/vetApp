import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UsuarioService {

  apiURL:string = 'http://localhost:8000/api/'

  httpHeaders: any = {
  	headers: {
  		'Content-Type': 'application/json',
	  	'Accept': 'application/json',
	  	'Authorization': 'Bearer',
  	}
  }

  constructor( public http: HttpClient ) { }

  // getUsers():Observable<any> {
  //   return this.http.get(this.apiURL + 'name'); //entre '' fica o nome da rota
  // }

  postClient(form:any):Observable<any> {
    return this.http.post(this.apiURL + 'registerClient', form, this.httpHeaders);
  }
}
