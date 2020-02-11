import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ProdutoService } from '../services/produto.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})
export class HomePage implements OnInit {
  public produtos = [];
  public categorias = [
    {
      nome: 'Alimentação',
      name: 'food',
      imagem: "../../assets/images/food.jpg"
    },
    {
      nome: 'Saúde',
      name: 'health',
      imagem: "../../assets/images/medicine.jpg"
    },
    {
      nome: 'Higiene',
      name: 'bath',
      imagem: "../../assets/images/petshower.jpg"
    },
    {
      nome: 'Acessórios',
      name: 'accessories',
      imagem: "../../assets/images/petclothes.jpg"
    }
  ];

  constructor(public router: Router, public produtoService: ProdutoService) { }

  public categoriaClick( i:string ){
    this.router.navigate('tabs/homecategoria', {produtoCategoria: i});
  }

  ngOnInit(){
    this.produtoService.listRecentes().subscribe((res)=>{
      //console.log(res[0]);
      this.produtos=res[0];
    }, err=>{
      console.log('ERRO');
    });
  }

}
