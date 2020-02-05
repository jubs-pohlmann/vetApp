import { Component, OnInit } from '@angular/core';
import { FormControl } from '@angular/forms';
import { FormGroup, FormBuilder, Validators} from '@angular/forms';
import { Router} from '@angular/router'
 
@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
  
  
  loginForm: FormGroup;

  constructor(public formbuilder: FormBuilder, public router: Router) {

    this.loginForm = this.formbuilder.group({
      
      email:[null,[Validators.required,Validators.email]],
      password:[null,[Validators.required,Validators.minLength(6)]],
         
    });
  }

  submitForm(form){
    console.log(form);
    console.log(form.value);
  }

  // navegarCadastroLoja(){
  //   this.router.navigate(['/CadastroLoja'])
  // }

  // navegarCadastroUsuario(){
  //   this.router.navigate(['cadastro'])
  // } <= ROTAS AINDA NÃO LINKADAS 


  ngOnInit() {
  }

}
