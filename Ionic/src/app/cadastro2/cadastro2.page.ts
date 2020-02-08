import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: 'app-cadastro2',
  templateUrl: './cadastro2.page.html',
  styleUrls: ['./cadastro2.page.scss'],
})
export class Cadastro2Page implements OnInit {

  registerForm:FormGroup;
  verificationError:boolean;
  
  constructor(public formbuilder: FormBuilder) {

    this.registerForm = this.formbuilder.group({
      address: [null, [Validators.required, Validators.minLength(5)]],
      cpf: [null, [Validators.required, Validators.minLength(11)]],
      password: [null, [Validators.required, Validators.minLength(5)]],
      passwordVerify: [null, [Validators.required, Validators.minLength(5)],]
    })
   }

   passwordVerification(form){
     if(form.value.password != form.value.passwordVerify){
       this.verificationError = true;
     } else{
       this.verificationError = false;
     }
   }

   submitForm(form){
     console.log(form);
     console.log(form.value);
   }

  ngOnInit() {
  }

}
