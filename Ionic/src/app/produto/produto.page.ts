import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ToastController } from '@ionic/angular';

@Component({
  selector: 'app-produto',
  templateUrl: './produto.page.html',
  styleUrls: ['./produto.page.scss'],
})
export class ProdutoPage implements OnInit {

  constructor(public router: Router, public toastController: ToastController) { }

  async presentToast() {
  	const toast = await this.toastController.create({
  		message: 'Aguardando confirmação de compra',
  		duration: 2000
  	});

  	toast.present();
  }

  irParaLoja(){
  	this.router.navigate(['/login'])
  }
  
  ngOnInit() {
    
  }

}
