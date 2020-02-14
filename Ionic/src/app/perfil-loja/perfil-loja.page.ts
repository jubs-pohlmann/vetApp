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

  async carrega(store_id:number) {
    await this.lojaservice.getLoja(store_id).subscribe((res)=>{
      console.log('oi')
      console.log(res)
      this.store=res[0];
      //console.log(res)
      //console.log(this.produto)
      this.lojaservice.getProdutos(this.store).subscribe((resLoja)=>{
        //console.log(resLoja)
        this.produto=resLoja[0];
      });
    });
  }

  ngOnInit() {
    console.log(this.store)
    this.carrega();
  }

}
