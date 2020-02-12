import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { ProdutoService } from '../services/produto.service';
import { Router } from '@angular/router';
import { Location } from '@angular/common';


@Component({
  selector: 'app-anunciar-produto',
  templateUrl: './anunciar-produto.page.html',
  styleUrls: ['./anunciar-produto.page.scss'],
})
export class AnunciarProdutoPage implements OnInit {

  registerForm: FormGroup;
  constructor(public router:Router, public formbuilder: FormBuilder, public produtoService: ProdutoService, private _location: Location) {

    this.registerForm = this.formbuilder.group({
      name: [null, [Validators.required, Validators.maxLength(30)]],
      price: [null, [Validators.required]],
      description: [null, [Validators.required]],
      animal: [null, [Validators.required]],
      category: [null, [Validators.required]],
      stock: [null, [Validators.required]],
      // photo: [null, [Validators.required]],
    })
   }

  ngOnInit() {
  }

  submitForm(registerForm) {

    if ( registerForm.status == "VALID" ) {

      

    console.log(registerForm);
    console.log(registerForm.value);
    
		this.produtoService.postProduto(registerForm.value).subscribe( 
      (res) => {
        localStorage.get("userToken")
			  this.router.navigate(['tabs/home']);
      },
      (error) => {
        console.log(error);
      } );
    }
  }
  
  backButton(){
    this._location.back();
  }

}
