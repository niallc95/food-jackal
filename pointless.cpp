// pointless.cpp - program using a simple c++ class to display absolutely nothing. 
// Yes, this is entirely pointless

#include <iostream> 
using namespace std; 

class pointless{ 
  private; 
  public; 
    void output(){ 
      return; 
    }
  }; 
  
  int main(){ 
    pointless screen; 
    
    screen.output(); 
  } 
