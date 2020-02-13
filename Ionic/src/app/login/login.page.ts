import { Component, OnInit } from '@angular/core';
import { FormControl } from '@angular/forms';
import { FormGroup, FormBuilder, Validators} from '@angular/forms';
import { AuthService } from '../services/auth.service';
import { Router } from '@angular/router';
import { ToastController } from '@ionic/angular';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {


  loginForm: FormGroup;

  constructor(public formbuilder: FormBuilder, public router: Router, public toastController: ToastController, public authService: AuthService) {

    this.loginForm = this.formbuilder.group({

      email:[null,[Validators.required,Validators.email]],
      password:[null,[Validators.required,Validators.maxLength(5)]],

    });
  }

  
  async presentToast() {
    const toast = await this.toastController.create({
      message: 'Logout realizado. Volte logo!',
      duration: 3000
    });

    toast.present();
  }

  public check(condition){
    if(localStorage.getItem(condition)===null){
      return true;
    }else{
      return false;
    }
  }
// checa se o usuario esta logado ou nao

   navegarCadastroLoja(){
     this.router.navigate(['/tabs/cadastroloja'])
  }

   navegarCadastroUsuario(){
    this.router.navigate(['/tabs/cadastro'])
   }

  loginUser( loginForm ) {

  	if ( loginForm.status == "VALID" ) {
  		this.authService.loginUser( loginForm.value ).subscribe(
  			(res) => {
          //console.log( res );
          console.log(res.success.token);
          // localStorage.setItem('')
  				localStorage.setItem( 'token', res.success.token );
  				this.router.navigate(['/tabs/home']);
  			}
  		);
  	}
  }

  logout(){
    this.authService.logoutUser();
        localStorage.removeItem('token');
        this.router.navigate(['/tabs/home']);
        this.presentToast();
  }

  ngOnInit() {
  }

}
