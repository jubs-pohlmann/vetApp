import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ToastController } from '@ionic/angular';
import { Location } from '@angular/common';
import { ProdutoService} from '../services/produto.service';


@Component({
  selector: 'app-produto',
  templateUrl: './produto.page.html',
  styleUrls: ['./produto.page.scss'],
})
export class ProdutoPage implements OnInit {

  constructor(public router: Router, public toastController: ToastController, public _location: Location, public produtoservice: ProdutoService) { }

    async presentToast() {
    	const toast = await this.toastController.create({
    		message: 'Solicitação de compra enviada para o vendedor. Aguarde a confirmação.',
    		duration: 3000
    	});

    	toast.present();
    }

  public compra(id:number){
    // this.produtoservice.getProduto(id).subscribe((res)=>{
    //   res.stock--;
    //   this.produtoservice.updateProduto(id, {stock:res.stock});
    // });
    this.produtoservice.buyProduto(id).subscribe((res)=>{
      this.router.navigateByUrl('tabs/home');
    });
    
  }
  
  
  ngOnInit() {
    
  }

  backButton(){
    this._location.back();
  }

}
