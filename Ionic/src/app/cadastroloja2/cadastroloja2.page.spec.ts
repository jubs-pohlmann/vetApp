import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { Cadastroloja2Page } from './cadastroloja2.page';

describe('Cadastroloja2Page', () => {
  let component: Cadastroloja2Page;
  let fixture: ComponentFixture<Cadastroloja2Page>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ Cadastroloja2Page ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(Cadastroloja2Page);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
