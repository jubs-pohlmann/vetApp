import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { TabsPage } from './tabs.page';

const routes: Routes = [
  {
    path: 'tabs',
    component: TabsPage,
    children: [
      {
        path: 'home',
        children: [
          {
            path: '',
            loadChildren: () =>
              import('../home/home.module').then(m => m.HomePageModule)
          }
       ]
     },
     {
      path: 'homecategoria',
      children: [
        {
          path: '',
          loadChildren: () =>
            import('../homecategoria/homecategoria.module').then(m => m.HomecategoriaPageModule)
        }
     ]
   },
      {
        path: 'tab1',
        children: [
          {
            path: '',
            loadChildren: () =>
              import('../tab1/tab1.module').then(m => m.Tab1PageModule)
          }
        ]
      },
      {
        path: 'tab2',
        children: [
          {
            path: '',
            loadChildren: () =>
              import('../tab2/tab2.module').then(m => m.Tab2PageModule)
          }
        ]
      },
      {
        path: 'tab3',
        children: [
          {
            path: '',
            loadChildren: () =>
              import('../tab3/tab3.module').then(m => m.Tab3PageModule)
          }
        ]
      },
       {
         path: 'cadastro',
         children: [
           {
             path: '',
             loadChildren: () =>
               import('../cadastro/cadastro.module').then(m => m.CadastroPageModule)
           }
        ]
      },
      {
        path: 'cadastroloja',
        children: [
          {
            path: '',
            loadChildren: () =>
              import('../cadastroloja/cadastroloja.module').then(m => m.CadastrolojaPageModule)
          }
       ]
     },
   {
    path: 'anunciar-produto',
    children: [
      {
        path: '',
        loadChildren: () =>
          import('../anunciar-produto/anunciar-produto.module').then(m => m.AnunciarProdutoPageModule)
      }
   ]
  },
      {
        path: 'login',
        children: [
          {
            path: '',
            loadChildren: () =>
              import('../login/login.module').then(m => m.LoginPageModule)
          }
        ]
      },
      {
        path: 'produto',
        children: [
          {
            path:'',
            loadChildren:() =>
            import('../produto/produto.module').then(m => m.ProdutoPageModule)
          }
        ]
      },
    ]
  },
  {
    path: '',
    redirectTo: '/tabs/home',
    pathMatch: 'full'
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class TabsPageRoutingModule {}
