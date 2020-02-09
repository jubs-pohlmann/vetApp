import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { HomecategoriaPage } from './homecategoria.page';

describe('HomecategoriaPage', () => {
  let component: HomecategoriaPage;
  let fixture: ComponentFixture<HomecategoriaPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ HomecategoriaPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(HomecategoriaPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
