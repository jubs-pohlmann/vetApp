import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ToastController } from '@ionic/angular';
import { Location } from '@angular/common'

@Component({
  selector: 'app-produto',
  templateUrl: './produto.page.html',
  styleUrls: ['./produto.page.scss'],
})
export class ProdutoPage implements OnInit {

  constructor(public router: Router, public toastController: ToastController) { }

    async presentToast() {
    	const toast = await this.toastController.create({
    		message: 'Solicitação de compra enviada para o vendedor. Aguarde a confirmação.',
    		duration: 3000
    	});

    	toast.present();
    }

  
  
  ngOnInit() {
    
  }

  backButton(){
    this._location.back();
  }

}
