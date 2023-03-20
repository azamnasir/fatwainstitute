import { Component } from '@angular/core';
import { PostsModel } from './posts/posts.model';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  storedPosts: PostsModel [] = [];

  onPostAdded(post:PostsModel){
    this.storedPosts.push(post);
  };
}
