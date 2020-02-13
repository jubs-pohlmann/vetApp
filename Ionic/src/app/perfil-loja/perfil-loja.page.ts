import { Component, OnInit } from '@angular/core';
import { Location } from '@angular/common';

@Component({
  selector: 'app-perfil-loja',
  templateUrl: './perfil-loja.page.html',
  styleUrls: ['./perfil-loja.page.scss'],
})
export class PerfilLojaPage implements OnInit {

  constructor( private _location: Location) { }

  backButton(){
    this._location.back();
  }

  ngOnInit() {
  }

}
