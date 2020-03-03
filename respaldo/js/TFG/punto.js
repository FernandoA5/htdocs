function punto (x, y)
{
    this.x=x;
    this.y=y;
}
punto.prototype.coincide = function(punto)
{
    return (this.x == punto.x && this.y==punto.y) ? true:false;
}