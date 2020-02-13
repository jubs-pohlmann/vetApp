import { Injectable } from '@angular/core';
import {  HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProdutoService {

  apiURL:string = 'http://localhost:8000/api/';

  httpHeaders: any = {
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Authorization': 'Bearer ',
    }
  }

  constructor( public http: HttpClient ) { }

  postProduto(form:any):Observable<any> {
    this.httpHeaders.headers["Authorization"] = "Bearer" + localStorage.getItem('token');
    return this.http.put(this.apiURL + 'createProduct', form, this.httpHeaders);
  }

  updateProduto(id:number, newStock:any):Observable<any> {
    this.httpHeaders.headers["Authorization"] = "Bearer" + localStorage.getItem('token');
    return this.http.put(this.apiURL + 'updateProduct/'+ id, newStock, this.httpHeaders);   
  }

  buyProduto(id:number):Observable<any> {
    this.httpHeaders.headers["Authorization"] = "Bearer" + localStorage.getItem('token');
    console.log(this.httpHeaders);
    return this.http.put(this.apiURL + 'sale/'+ id, null, this.httpHeaders);
  }

  getProduto(id:number):Observable<any>{
    return this.http.get(this.apiURL + 'showProduct/' + id);
  }

  listRecentes():Observable<any> {
    return this.http.get(this.apiURL + 'orderBy');
  }
  listAnimal( animal:string ):Observable<any> {
    return this.http.get(this.apiURL + 'animal/' + animal);
  }
  listCategoria( categoria:string ):Observable<any> {
    return this.http.get(this.apiURL + 'category/'+ categoria);
  }
}
