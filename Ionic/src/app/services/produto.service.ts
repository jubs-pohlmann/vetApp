import { Injectable } from '@angular/core';
import {  HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProdutoService {

  apiURL:string = 'http://localhost:8000/api/'
  constructor( public http: HttpClient ) { }

  postProduto(form:any):Observable<any> {
    return this.http.post(this.apiURL + 'createProduto', form);
  }

  // ListProdutos(id:number):Observable<any>{
  //   return this.http.get(this.apiURL + 'listProduct/{id}', id);
  // }
}
