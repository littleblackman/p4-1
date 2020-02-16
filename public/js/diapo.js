class Flag{
	constructor()
	{
		this.signaler = document.getElementsByClassName('signaler');
		this.alert = document.getElementById('alert');
	}
	commentSignale()
	{
		
	    this.alert.style.display = 'block';
	    setTimeout(() => {
	    this.alert.style.display = "none";
	                }, 3000);  
	}
    auClick()
    {
    	this.alert.style.display = 'none';
    	this.signaler.addEventListener("click",() => this.commentSignale());

    }
}
let flag = new Flag();
flag.commentSignale();
flag.auClick();



