import { Component, OnInit } from '@angular/core';
import { ProdutoService } from '../services/produto.service';
import { ActivatedRoute, Router } from '@angular/router';


@Component({
  selector: 'app-homecategoria',
  templateUrl: './homecategoria.page.html',
  styleUrls: ['./homecategoria.page.scss'],
})
export class HomecategoriaPage implements OnInit {

  constructor(private router: ActivatedRoute, public produtoService: ProdutoService) {
    console.log('aaaaaaaaaaa');
    this.produtoCategoria = this.router.snapshot.params["produtoCategoria"];
  }

  produtos=[];
  produtoCategoria:string;


  ngOnInit() {
    this.produtoService.listCategoria(this.produtoCategoria).subscribe((res)=>{
      console.log(res[0]);
      this.produtos=res[0];
    }, err=>{
      console.log('ERRO');
    });
  }

}
