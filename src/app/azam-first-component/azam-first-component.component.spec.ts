import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AzamFirstComponentComponent } from './azam-first-component.component';

describe('AzamFirstComponentComponent', () => {
  let component: AzamFirstComponentComponent;
  let fixture: ComponentFixture<AzamFirstComponentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AzamFirstComponentComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AzamFirstComponentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
