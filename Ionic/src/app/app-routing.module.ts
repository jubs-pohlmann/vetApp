import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: '',
    loadChildren: () => import('./tabs/tabs.module').then(m => m.TabsPageModule)
  },
  {

    path: 'cadastro',
    loadChildren: () => import('./cadastro/cadastro.module').then( m => m.CadastroPageModule)
  },  {
    path: 'cadastro2',
    loadChildren: () => import('./cadastro2/cadastro2.module').then( m => m.Cadastro2PageModule)
  },
  {
    path: 'cadastroloja',
    loadChildren: () => import('./cadastroloja/cadastroloja.module').then( m => m.CadastrolojaPageModule)
  },
  {
    path: 'cadastroloja2',
    loadChildren: () => import('./cadastroloja2/cadastroloja2.module').then( m => m.Cadastroloja2PageModule)
  },
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: 'anunciar-produto',
    loadChildren: () => import('./anunciar-produto/anunciar-produto.module').then( m => m.AnunciarProdutoPageModule)
  }

    path: '',
    loadChildren: () => import('./login/login.module').then( m => m.LoginPageModule)
  },  {
    path: 'produto',
    loadChildren: () => import('./produto/produto.module').then( m => m.ProdutoPageModule)
  }



];
@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule {}
