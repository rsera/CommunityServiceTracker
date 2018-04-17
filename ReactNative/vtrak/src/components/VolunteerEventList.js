import React, { Component } from 'react';
import { View, Text, ScrollView } from 'react-native';
import EventCard from './EventCard';

class VolunteerEventList extends Component {

  constructor(props) {
    super(props);

    this.state = {
      content: [],
    };

    this.fetchData = this.fetchData.bind(this);
  }

  componentWillMount() {
    console.log("will mount");
    this.fetchData();
  }

  fetchData() {
    fetch('http://www.aptimage.net/getEventDataMobile.php')
   .then((response) => response.text()).then((responseJsonFromServer) =>
    {
      obj = JSON.parse(responseJsonFromServer);
      this.setState({content: obj});

    }).catch((error) =>
    {
      console.log('Could not retrieve data.');
      console.error(error);
    });
  }

  renderEvents() {
    console.log(this.state.content, "in renderEvents()", this.state.content.length);
    if( this.state.content.length > 0)
    {
      var i = -1;

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
