import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
@Component({
  selector: 'app-anunciar-produto',
  templateUrl: './anunciar-produto.page.html',
  styleUrls: ['./anunciar-produto.page.scss'],
})
export class AnunciarProdutoPage implements OnInit {

  registerForm: FormGroup;
  constructor(public formbuilder: FormBuilder) {

    this.registerForm = this.formbuilder.group({
      name: [null, [Validators.required, Validators.maxLength(30)]],
      price: [null, [Validators.required]],
      description: [null, [Validators.required]],
      // photo: [null, [Validators.required]],
    })
   }

  ngOnInit() {
  }

  submitForm(form){
    console.log(form);
    console.log(form.value);
  }

}
