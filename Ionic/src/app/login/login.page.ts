import { Component, OnInit } from '@angular/core';
import { FormControl } from '@angular/forms';
import { FormGroup, FormBuilder, Validators} from '@angular/forms';
import { AuthService } from '../services/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
  
  
  loginForm: FormGroup;

  constructor(public formbuilder: FormBuilder, public router: Router, public authService: AuthService) {

    this.loginForm = this.formbuilder.group({
      
      email:[null,[Validators.required,Validators.email]],
      password:[null,[Validators.required,Validators.maxLength(5)]],
         
    });
  }

  submitForm(form){
    //console.log(form);
    //console.log(form.value);
  }

   navegarCadastroLoja(){
     this.router.navigate(['/Cadastroloja'])
  }

   navegarCadastroUsuario(){
    this.router.navigate(['cadastro'])
   } 

  loginUser( loginForm ) {

  	
  	if ( loginForm.status == "VALID" ) {

  		this.authService.loginUser( loginForm.value ).subscribe(
  			(res) => {
          //console.log( res );
          console.log(res.data.token);
  				localStorage.setItem( 'userToken', res.data.token );
  				this.router.navigate(['home']);
  			}
  		);

  	}
  }


  ngOnInit() {
  }

}
