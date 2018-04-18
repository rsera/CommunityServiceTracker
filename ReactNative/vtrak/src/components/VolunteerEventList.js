import React, { Component } from 'react';
import { View, Text, ScrollView } from 'react-native';
import EventCard from './EventCard';

class VolunteerEventList extends Component {

  constructor(props) {
    super(props);

    this.state = {
      content: [],
      timer: null,
      new: false
    };

    this.fetchData = this.fetchData.bind(this);
  }

  componentWillMount() {
    this.fetchData();
    let timer = setInterval(this.fetchData, 1000);
    this.setState({timer});
  }


  fetchData(){
    fetch('http://www.aptimage.net/getEventDataMobile.php')
   .then((response) => response.text()).then((responseJsonFromServer) =>
    {
      if(responseJsonFromServer === "new user")
      {
        this.setState({new: true});
      }
      else 
      {
        console.log(responseJsonFromServer);
        obj = JSON.parse(responseJsonFromServer);
        this.setState({content: obj});
      }
      

    }).catch((error) =>
    {
      console.log('Could not retrieve data.');
      console.error(error);
    });
  }

  renderEvents() {

    if( this.state.content.length > 0)
    {
      //console.log("fetched", this.state.content);
      var i = -1;

      if(this.state.new === true)
      {
        
        return (this.state.content.map(experience =>
          {
            i++;
            return(
              <EventCard key={this.state.content[i].experienceID} experience={this.state.content[i]}/>
            );
          }));
      }
      else
      {
        return;
      }

    }

    else
    {
      console.log("wait");
      return ;
    }

  }

  render() {
    return (
      <View style={{backgroundColor: '#F9F9F9', flex:1}}>
        <View style={styles.containerStyle}>
          <ScrollView style={{flex:1}}>
            {this.renderEvents()}
          </ScrollView>
        </View>
      </View>
    );
  }
}

const styles = {
  containerStyle: {
    marginTop: 5,
    flex:1
  }
};

export default VolunteerEventList;
