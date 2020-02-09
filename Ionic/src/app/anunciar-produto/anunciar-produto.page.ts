import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { ProdutoService } from '../services/produto.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-anunciar-produto',
  templateUrl: './anunciar-produto.page.html',
  styleUrls: ['./anunciar-produto.page.scss'],
})
export class AnunciarProdutoPage implements OnInit {

  registerForm: FormGroup;
  constructor(public router:Router, public formbuilder: FormBuilder, public produtoService: ProdutoService) {

    this.registerForm = this.formbuilder.group({
      name: [null, [Validators.required, Validators.maxLength(30)]],
      price: [null, [Validators.required]],
      description: [null, [Validators.required]],
      animal: [null, [Validators.required]],
      category: [null, [Validators.required]],
      stock: [null],
      // photo: [null, [Validators.required]],
    })
   }

  ngOnInit() {
  }

  submitForm(form) {
    form.value.stock=1;
		this.produtoService.postProduto(form.value).subscribe( 
      (res) => {
        console.log(res);
			  this.router.navigateByUrl('tabs/home');//MUDANCA RECENTE N TESTADA
      },
      (error) => {
        console.log(error);
      } );
		console.log(form);
		console.log(form.value);
	}

}
