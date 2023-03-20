import { Component } from '@angular/core';

@Component({
  selector: 'app-azam-first-component',
  templateUrl: './azam-first-component.component.html',
  styleUrls: ['./azam-first-component.component.css']
})
export class AzamFirstComponentComponent {
  fontColor = 'blue';
  sayHelloId = 1;
  canClick = false;
  // message = 'Hello, World';
 
  sayMessage() {
    alert(this.message);
  }


  message = "I'm read only!";
  canEdit = false;
 
  onEditClick() {
    this.canEdit = !this.canEdit;
    if (this.canEdit) {
      this.message = 'You can edit me!';
    } else {
      this.message = "I'm read only!";
    }
    this.sayMessage();
  }
}
