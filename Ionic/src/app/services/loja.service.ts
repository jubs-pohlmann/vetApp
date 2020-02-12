import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class LojaService {

  apiURL: string = 'http://localhost/8000/api/'

  httpHeaders: any = {
  	headers: {
  		'Content-Type': 'application/json',
	  	'Accept': 'application/json',
	  	'Authorization': 'Bearer',
  	}
  }

  constructor(public http:HttpClient, public router:Router) { }

  // getLoja(id:number):Observable<any> {
  //   return this.http.get(this.apiUrl + 'showStore/' + id);
  // }

  registerStore(form:any):Observable<any> {
    return this.http.post(this.apiURL + 'registerStore', form,this.httpHeaders);
  }

}

