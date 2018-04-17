import React, { Component } from 'react';
import { View, Text, StyleSheet } from 'react-native';

class GoalBar extends Component {
  constructor(props) {
    super(props);

    this.state = {
      goal: '',
      hours: '',
      timer: null
    };

    this.fetchData = this.fetchData.bind(this);
  }

  componentWillMount() {
    this.fetchData();
    let timer = setInterval(this.fetchData, 1000);
    this.setState({timer});
  }

  fetchData() {
    fetch('http://www.aptimage.net/getGBContentMobile.php')
   .then((response) => response.text()).then((responseJsonFromServer) =>
    {

      obj = JSON.parse(responseJsonFromServer);

      this.setState({hours: obj.hours});
      this.setState({goal: obj.goal});
    }).catch((error) =>
    {
      console.log('Could not retrieve hours.');
      console.error(error);
    });
  }

  render() {
    return (
      <View style={{alignItems: 'center'}}>
        <Text style={styles.textStyle}> {this.state.hours} / {this.state.goal} </Text>
        <Text style={styles.hoursStyle}>hours</Text>
      </View>

      // <View style={styles.viewStyle}>
      // {/* <Text> Goal </Text> */}
      // <View style={styles.colorFillStyle}></View>
      // <View style={styles.color2FillStyle}></View>
      // <Text style={styles.textStyle}>  </Text>
      // </View>
    );
  }
}

const styles = StyleSheet.create({
  textStyle: {
    shadowColor: '#808080',
    shadowRadius: 50,
    shadowOpacity: 0.4,
    shadowOffset: { width: 0, height: 2 },
    fontSize: 60,
    color: '#76CB89',
    fontWeight: 'bold'
  },
  hoursStyle: {
    fontSize: 14,
    color: '#76CB89'
  }
});

export default GoalBar;
