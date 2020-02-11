import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class LojaService {

  apiURL: string = 'http://localhost/8000/api/'
  constructor(public http:HttpClient, public router:Router) { }

  postLoja(form:any):Observable<any>{
    return this.http.post(this.apiURL + 'registerStore', form);
  }

  getLoja(id:number):Observable<any> {
    return this.http.get(this.apiURL + 'showStore/' + id);
  }
}
