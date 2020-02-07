import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { Cadastroloja2Page } from './cadastroloja2.page';

const routes: Routes = [
  {
    path: '',
    component: Cadastroloja2Page
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class Cadastroloja2PageRoutingModule {}
