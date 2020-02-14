import { Component, OnInit, Input } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { ToastController } from '@ionic/angular';
import { Location } from '@angular/common';
import { ProdutoService} from '../services/produto.service';
import { LojaService } from '../services/loja.service';


@Component({
  selector: 'app-produto',
  templateUrl: './produto.page.html',
  styleUrls: ['./produto.page.scss'],
})
export class ProdutoPage implements OnInit {
  @Input() prodObj = { }

  produto:any = {
    id: 1,
    photo: null,
    name: "",
    price: "",
    category: "",
    description: "",
    animal: "",
    stock: 2,
    store_id: 55
  };
  loja:any = {
    id: 1,
    rating: null,
    cnpj: "82.553.129/0001-91",
    delivery: 1,
    user_id: 23,
    user: [{
      id: 1,
      name: "",
      email: "",
      email_verified_at: null,
      photo: null,
      phone: "",
      address: ""
    }]
  };
  produtoClick:number;

  constructor(public router: Router, public toastController: ToastController, public _location: Location, public produtoservice: ProdutoService, public lojaservice: LojaService, private inputRouter :ActivatedRoute) {

    this.produtoClick= this.inputRouter.snapshot.params["produtoClick"];

   }

    async presentToast() {

    	const toast = await this.toastController.create({
        message: 'Solicitação de compra enviada para o vendedor. Aguarde a confirmação.',
        cssClass: "toastClass",
    		duration: 1000
    	});

    	toast.present();
    }

    async presentToastErroCompra() {
      
    	const toast = await this.toastController.create({
        message: 'Você não está logado, por favor entre com sua conta!',
        cssClass: "toastClass",
    		duration: 1000
    	});

    	toast.present();
    }

  public compra(id:number){
    this.produtoservice.buyProduto(id).subscribe(
      (res)=>{
      console.log(res)
      this.router.navigate(['tabs/home']);
      this.presentToast();
    },error=>{
      console.log(error);
      this.router.navigate(['tabs/login']);
      this.presentToastErroCompra();
    });
  }

  async carrega() {
    await this.produtoservice.getProduto(this.produtoClick).subscribe((res)=>{
      this.produto=res[0];
      //console.log(res)
      //console.log(this.produto)
      this.lojaservice.getLoja(res[0].store_id).subscribe((resLoja)=>{
        //console.log(resLoja)
        this.loja=resLoja[0];
      });
    });
  }

   encaminhaParaLoja( i:number ){
    this.router.navigate(['/tabs/perfil-loja', {loja:i}])
  }

  ngOnInit() {
    console.log(this.produtoClick)
    this.carrega();

  }

  backButton(){
    this._location.back();
  }

}
