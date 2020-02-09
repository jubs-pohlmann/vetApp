import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-cadastroloja',
  templateUrl: './cadastroloja.page.html',
  styleUrls: ['./cadastroloja.page.scss'],
})
export class CadastrolojaPage implements OnInit {

  registerForm: FormGroup;

  constructor(public formbuilder: FormBuilder) {
    this.registerForm = this.formbuilder.group({
      name: [null, [Validators.required, Validators.minLength(2)]],
      email: [null,[Validators.required,Validators.email]],
      cnpj: [null, [Validators.required,Validators.minLength(1)]], //FIX
      phone: [null, [Validators.required]]
    });
   }

   submitForm(form){
     console.log(form);
     console.log(form.value);
   }

  ngOnInit() {
  }

}
