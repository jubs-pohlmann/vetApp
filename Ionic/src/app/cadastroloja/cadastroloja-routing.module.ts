import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { CadastrolojaPage } from './cadastroloja.page';

const routes: Routes = [
  {
    path: '',
    component: CadastrolojaPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class CadastrolojaPageRoutingModule {}
