import { Injectable } from '@angular/core';
import {  HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProdutoService {

  apiURL:string = 'http://localhost:8000/api/';

  httpHeaders: object = {
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Autorization': 'Bearer '
    }
  }

  constructor( public http: HttpClient ) { }

  postProduto(form:any):Observable<any> {
    return this.http.post(this.apiURL + 'createProduto', form);
  }

  listRecentes():Observable<any> {
    return this.http.get(this.apiURL + 'orderBy');
  }
  listAnimal():Observable<any> {
    return this.http.get(this.apiURL + 'animal');
  }
  listCategoria( categoria:string ):Observable<any> {
    return this.http.get(this.apiURL + 'category/'+ categoria);
  }
}
