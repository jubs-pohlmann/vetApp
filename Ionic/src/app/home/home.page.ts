import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ProdutoService } from '../services/produto.service';
@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})
export class HomePage implements OnInit {


    produtos= [{
      name: 'ração eca',
      description: 'muito ecaa aaaaaaaaaaaaaaaaaaaaaa',
      price: 112,
      photo: null,
      animal: "cats",

    },
    {
      name: 'ração boa',
      description: 'muito boaaa aaaaaaaaaaaaaaaaaaaaaa',
      price: 11230124,
      photo: null,
      animal: "dogs",

    },
    {
    name: 'ração media',
      description: 'muito boaaa aaaaaaaaaaaaaaaaaaaaaa',
      price: 11230124,
      photo: null,
      animal: "cats",

    }
  ]

  constructor(public router: Router, public produto: ProdutoService) { }

  categoriaClick(){
    this.router.navigateByUrl('tabs/homecategoria');
  }

  ngOnInit(){
    this.produto.listRecentes().subscribe((res)=>{
      //console.log(res[0]);
      this.produtos=res[0];
    }, err=>{
      console.log('ERRO');
    });
  }

}
