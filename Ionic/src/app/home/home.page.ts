import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})
export class HomePage implements OnInit {

  constructor() { }

  ngOnInit() {
  }
  produtos= [{
    name: 'ração eca',
    description: 'muito ecaa aaaaaaaaaaaaaaaaaaaaaa',
    price: 112,
    photo: null,
    animal: "cats",

  },
  {
    name: 'ração boa',
    description: 'muito boaaa aaaaaaaaaaaaaaaaaaaaaa',
    price: 11230124,
    photo: null,
    animal: "dogs",

  },
  {
  name: 'ração media',
    description: 'muito boaaa aaaaaaaaaaaaaaaaaaaaaa',
    price: 11230124,
    photo: null,
    animal: "cats",

  }
]
 
}
