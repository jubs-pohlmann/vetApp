import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ProdutoService } from '../services/produto.service';
import { LojaService } from '../services/loja.service';
import { ProdutoComponent } from '../components/produto/produto.component';
import { IonSlides } from '@ionic/angular';
@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})
export class HomePage implements OnInit {

  produtos:any =[];
  
  slideOpts={
    slidesPerView:2
  }

  public categorias = [
    {
      nome: 'Alimentos',
      name: 'Alimentos',
      imagem: "../../assets/images/Alimentos.jpg"
    },
    {
      nome: 'Saúde',
      name: 'Saúde',
      imagem: "../../assets/images/Saúde.jpg"
    },
    {
      nome: 'Higiene',
      name: 'Higiene',
      imagem: "../../assets/images/Higiene.jpg"
    },
    {
      nome: 'Acessórios',
      name: 'Acessórios',
      imagem: "../../assets/images/Acessórios.jpg"
    }
  ];

  public animais = [
    {
      nome: 'Cães',
      name: 'Cães',
      imagem: "../../assets/images/Cães.jpg"
    },
    {
      nome: 'Gatos',
      name: 'Gatos',
      imagem: "../../assets/images/Gatos.jpg"
    },
    {
      nome: 'Aves',
      name: 'Aves',
      imagem: "../../assets/images/Aves.jpg"
    },
    {
      nome: 'Peixes',
      name: 'Peixes',
      imagem: "../../assets/images/Peixes.jpg"
    }
  ];

  constructor(public router: Router, public produtoService: ProdutoService) {


   }

  public categoriaClick( i:string ){
    this.router.navigate(['tabs/homecategoria', {produtoCategoria: i}]);
  }

  public check(condition){
    if(localStorage.getItem(condition)=='true'){
      return true;
    }else{
      return false;
    }
  }

  irParaAnunciarProduto(){
    this.router.navigate(['tabs/anunciar-produto']);
  }

  ngOnInit(){
    this.produtoService.listRecentes().subscribe((res)=>{
      console.log(res[0]);
      this.produtos=res[0];
    }, error=>{
      console.log(error);
    });
  }

}
