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
  },
  {
    path: 'cadastroloja',
    loadChildren: () => import('./cadastroloja/cadastroloja.module').then( m => m.CadastrolojaPageModule)
  },
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: 'anunciar-produto',
    loadChildren: () => import('./anunciar-produto/anunciar-produto.module').then( m => m.AnunciarProdutoPageModule)
  },
  {
    path: 'login',
    loadChildren: () => import('./login/login.module').then( m => m.LoginPageModule)
  },
  {
    path: 'produto',
    loadChildren: () => import('./produto/produto.module').then( m => m.ProdutoPageModule)
  },
  {
    path: 'homecategoria',
    loadChildren: () => import('./homecategoria/homecategoria.module').then( m => m.HomecategoriaPageModule)
  },
  {
    path: 'perfil-loja',
    loadChildren: () => import('./perfil-loja/perfil-loja.module').then( m => m.PerfilLojaPageModule)
  },


];
@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule {}
