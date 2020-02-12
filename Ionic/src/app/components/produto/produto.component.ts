import { Component, OnInit, Input } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-produto',
  templateUrl: './produto.component.html',
  styleUrls: ['./produto.component.scss'],
})
export class ProdutoComponent implements OnInit {

  @Input() prodObj = { }


  constructor(public router:Router) { }

  public produtoClick( id:number ){
    this.router.navigate(['tabs/produto', {produtoClick: id}]);
  }

  ngOnInit() {}

}
