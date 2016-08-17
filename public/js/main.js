//import Vue from 'vue';
//import Autocomplete from '/js/autocomplete.vue';


new Vue ({
	el: "body",
	data: {
		isDisabled: true,
		usern: '',
	  
		countries : [
	            'Belarus','USA','Lithuania',
	            'Russia','India','England', 'Romania', 'Ruanda'
	    ],

	    value: ''
	  
	},

	

	components: {
		 
		autocomplete: {
			template: '#autocompl-list-template',
			props: {
		        suggestions: {
		            type: Array,
		            required: true
		        },

		        selection: {
		            type: String,
		            required: true,
		            twoWay: true
		        }
	    	},

		    data: function() {
			    return {
			        open: false,
			        current: 0
			        }
		    },

	    	computed: {

		        //Filtering the suggestion based on the input
		        matches() {
		            return this.suggestions.filter((str) => {
		                return str.indexOf(this.selection) >= 0;
		            });
		        },

		        //The flag
		        openSuggestion() {
		            return this.selection !== "" &&
		                   this.matches.length != 0 &&
		                   this.open === true;
		        }
		    },
	    
		    methods: {
		        
		        blurInput() {
		         	console.log ('Danger');
		          // if (!this.openSuggestion) {
		          //      	this.selection = '';
		          //      	this.open = false;
		          //     }
		          //  else if (!(this.selection in this.matches)) {
		          //  		console.log (this.$options); //#autocompl-list-template'
		          //  }   
		        },    
		        

		        //When enter pressed on the input
		        enter() {
		            
		            this.selection = this.matches[this.current];
		            this.open = false;
		        },

		        //When up pressed while suggestions are open
		        up() {
		            if(this.current > 0)
		                this.current--;
		        },

		        //When up pressed while suggestions are open
		        down() {
		            if(this.current < this.suggestions.length - 1)
		                this.current++;
		        },

		        //For highlighting element
		        isActive(index) {
		            return index === this.current;
		        },

		        //When the user changes input
		        change() {
		            if (this.open == false) {
		                this.open = true;
		                this.current = 0;
		            }

		        },

		        //When one of the suggestion is clicked
		        suggestionClick(index) {
		            this.selection = this.matches[index];
		            this.open = false;
		        },
	    
			} 
		}
	},
	
	validators: { // `numeric` and `url` custom validator is local registration
	    numeric: function (val/*,rule*/) {
	      return /^[0-9]+$/.test(val)
	    },
	    url: function (val) {
	      return /^(http\:\/\/|https\:\/\/)(.{4,})$/.test(val)
	    },
	    text: function (val) {
	      return /^[a-zA-Z\-0-9]+$/.test(val)
	    },
	    email: function (val) {
    		return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(val)
  		}
  	},

  	computed: {

        //Filtering the suggestion based on the input
        matches() {
            return this.suggestions.filter((str) => {
                return str.indexOf(this.selection) >= 0;
            });
        },

        //The flag
        openSuggestion() {
            return this.selection !== "" &&
                   this.matches.length != 0 &&
                   this.open === true;
        }
    },

	methods:  {
	 	enableButton: function () {
			this.isDisabled = false;
			if (!this.$validation1.username.pristine && this.$validation1.username.invalid)
			 {console.log('Valid:' + this.$validation1.username.invalid)};
		},
		disableButton: function () {
			this.isDisabled = true;
		},

		trimInput: function () {
			this.usern = this.usern.trim();
		},

		

	},
	
	ready: function () {
		//alert("It's work fine");
	},

			
});