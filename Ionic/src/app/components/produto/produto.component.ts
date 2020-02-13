import { Component, OnInit, Input } from '@angular/core';
import { Router } from '@angular/router';
import { LojaService } from '../../services/loja.service';

@Component({
  selector: 'app-produto',
  templateUrl: './produto.component.html',
  styleUrls: ['./produto.component.scss'],
})
export class ProdutoComponent implements OnInit {

  @Input() prodObj = { }
  loja:any;

  constructor(public router:Router, public lojaService:LojaService) { }

  public produtoClick( id:number ){
    this.router.navigate(['tabs/produto', {produtoClick: id}]);
  }

  // public getLoja( id: number ){
  //   return this.lojaService.getLoja(id);
  // }

  ngOnInit() {
    

  }

}
