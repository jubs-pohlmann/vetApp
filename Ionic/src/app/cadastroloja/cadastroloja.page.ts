import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { Location } from '@angular/common';
@Component({
  selector: 'app-cadastroloja',
  templateUrl: './cadastroloja.page.html',
  styleUrls: ['./cadastroloja.page.scss'],
})
export class CadastrolojaPage implements OnInit {

  registerForm: FormGroup;
  verificationError: boolean;

  constructor(public formbuilder: FormBuilder, private _location: Location) {
    this.registerForm = this.formbuilder.group({
      name: [null, [Validators.required, Validators.minLength(2)]],
      email: [null,[Validators.required,Validators.email]],
      cnpj: [null, [Validators.required,Validators.minLength(1)]], //FIX
      phone: [null, [Validators.required]],
      delivery: [null, [Validators.required]],
      address: [null,[Validators.required, Validators.minLength(2)]],
      password: [null,[Validators.required, Validators.minLength(6)]],
      passwordVerify: [null,[Validators.required,Validators.minLength(6)]]   
    });
   }

   submitForm(form){
     console.log(form);
     console.log(form.value);
   }

   passwordVerification(form){
    if(form.value.password != form.value.passwordVerify){
      this.verificationError = true;
    } else{
      this.verificationError = false;
    }
  }

  backButton(){
    this._location.back();
  }

  ngOnInit() {
  }

}
