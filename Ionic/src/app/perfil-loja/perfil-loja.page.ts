import { Component, OnInit } from '@angular/core';
import { Location } from '@angular/common';
import { LojaService } from '../services/loja.service'
import { ActivatedRoute } from '@angular/router';




@Component({
  selector: 'app-perfil-loja',
  templateUrl: './perfil-loja.page.html',
  styleUrls: ['./perfil-loja.page.scss'],
})
export class PerfilLojaPage implements OnInit {

  constructor( private _location: Location, public lojaservice: LojaService, private router: ActivatedRoute) { 
    this.store=this.router.snapshot.params["store"];
  }

  store:number;
  produtos:any=[]

  backButton(){
    this._location.back();
  }

  ngOnInit() {
    this.lojaservice.getProdutos( this.store).subscribe((res)=>{
      console.log(res[0]);
      this.produtos=res[0];
    }, error=>{
      console.log(error);
    });
  }

}
