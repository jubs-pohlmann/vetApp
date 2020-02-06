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
         path: 'cadastro2',
         children: [
           {
             path: '',
             loadChildren: () =>
               import('../cadastro2/cadastro2.module').then(m => m.Cadastro2PageModule)
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
      path: 'cadastroloja2',
      children: [
        {
          path: '',
          loadChildren: () =>
            import('../cadastroloja2/cadastroloja2.module').then(m => m.Cadastroloja2PageModule)
        }
     ]
   },
      {
        path: '',
        redirectTo: '/tabs/tab1',
        pathMatch: 'full'
      }
    ]
  },
  {
    path: '',
    redirectTo: '/tabs/tab1',
    pathMatch: 'full'
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class TabsPageRoutingModule {}
