<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Article</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
    <link rel="stylesheet" href="/vue-autocomplete.css">
</head>
<body>
        
        <validator name="validation1"
             @valid="enableButton"
             @invalid="disableButton"
            >
            <form novalidate class="col-md-4 col-md-offset-4" action="/" method="post">
              <h1 >Welcom New User</h1>
                <hr>
                {!! csrf_field() !!}
              <div class="form-group username-field">
                <label for="username">username:</label>
                <input id="username" type="text" class="form-control" placeholder="Enter Your Name"
                v-model = "usern"
                v-bind = "trimInput"
                v-validate:username="{ required: true, minlength: 4, text: true }"
                >
              </div>

                <div class="alert alert-danger"
                    v-if="!$validation1.username.pristine && $validation1.username.invalid"
                >
                    <p v-if="$validation1.username.required">Required your name.</p>
                    <p v-if="$validation1.username.minlength">Your name is too short.</p>
                    <p v-if="$validation1.username.text">There are invalid characters.</p>
                </div>

                <div class="form-group">
                    <label> Country:</label>
                    <autocomplete :suggestions="countries" :selection.sync="value"></autocomplete>
                </div>
                
              <div class="form-group username-field">
                <label for="age">Age:</label>
                <input id="age" type="text" class="form-control" placeholder="Enter Your Age"
                v-validate:age="{ required: true, minlength: 1, maxlength: 3, numeric: true }"
                >
              </div>

                <div class="alert alert-danger"
                    v-if="!$validation1.age.pristine && $validation1.age.invalid"
                >
                    <p v-if="$validation1.age.required">Required your age.</p>
                    <p v-if="$validation1.age.minlength">Your age is too short.</p>
                    <p v-if="$validation1.age.maxlength">Your age is too long.</p>
                    <p v-if="$validation1.age.numeric">Your age is no numeric.</p>
                </div>                
              
              <div class="form-group comment-field">
                <label for="comment">comment:</label>
                <textarea id="comment" placeholder="Describe yourself here..." 
                class="form-control" 
                v-validate:comment="{ required: true, maxlength: 18 }"
                ></textarea>
              </div>
              <div class="alert alert-danger" 
                v-if="!$validation1.comment.pristine && $validation1.comment.invalid"
              >
                <p v-if="$validation1.comment.required">Required your comment.</p>
                <p v-if="$validation1.comment.maxlength">Your comment is too long.</p>
              </div>
              <button v-bind:class="{ 'btn btn-primary disabled': isDisabled, 'btn btn-primary' : !isDisabled }" type="submit">Send</button>
            </form>
        </validator>
        <template id="autocompl-list-template">
        <!--http://fareez.info/blog/create-your-own-autocomplete-using-vuejs/-->
                    <div style="position:relative" v-bind:class="{'open':openSuggestion}">
                        <input class="form-control" type="text" placeholder="Enter Your Country" v-model="selection"
                            @keydown.enter = 'enter'
                            @keydown.down = 'down'
                            @keydown.up = 'up'
                            @input = 'changeInput'
                            @change = 'change'
                        />
                        <ul class="dropdown-menu" style="width:100%">
                            <li v-for="suggestion in matches"
                                v-bind:class="{'active': isActive($index)}"
                                @click="suggestionClick($index)"
                            >
                                <a href="#">@{{ suggestion }}</a>
                            </li>
                        </ul> 

                         
                    </div>
                    
                </template>  
    <script src="/js/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
    <script src="https://cdn.jsdelivr.net/vue.validator/2.1.5/vue-validator.min.js"></script>
    <script src="/js/main.js"></script>
    </body>
</html>
