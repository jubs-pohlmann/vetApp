import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ProdutoService } from '../services/produto.service';
import { ProdutoComponent } from '../components/produto/produto.component';

@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})
export class HomePage implements OnInit {

  produtos:any = [];

  public categorias = [
    {
      nome: 'Alimentação',
      name: 'food',
      imagem: "../../assets/images/food.jpg"
    },
    {
      nome: 'Saúde',
      name: 'health',
      imagem: "../../assets/images/health.jpg"
    },
    {
      nome: 'Higiene',
      name: 'bath',
      imagem: "../../assets/images/bath.jpg"
    },
    {
      nome: 'Acessórios',
      name: 'accessories',
      imagem: "../../assets/images/accessories.jpg"
    }
  ];

  public animais = [
    {
      nome: 'Cães',
      name: 'dogs',
      imagem: "../../assets/images/dogs.jpg"
    },
    {
      nome: 'Gatos',
      name: 'cats',
      imagem: "../../assets/images/cats.jpg"
    },
    {
      nome: 'Aves',
      name: 'birds',
      imagem: "../../assets/images/birds.jpg"
    },
    {
      nome: 'Peixes',
      name: 'fishes',
      imagem: "../../assets/images/fishes.jpg"
    }
  ];

  constructor(public router: Router, public produtoService: ProdutoService) { }

  public categoriaClick( i:string ){
    this.router.navigate(['tabs/homecategoria', {produtoCategoria: i}]);
  }

  ngOnInit(){
    this.produtoService.listRecentes().subscribe((res)=>{
      //console.log(res[0]);
      this.produtos=res[0];
    }, error=>{
      console.log(error);
    });
  }

}
