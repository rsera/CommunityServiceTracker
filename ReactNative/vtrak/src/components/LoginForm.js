import React, { Component, Text, View } from 'react';
import Button from './common/Button';
import Card from './common/Card';
import CardSection from './common/CardSection';
import Input from './common/Input';
import { Actions } from 'react-native-router-flux';


class LoginForm extends Component {
  state = { username: '', password: '' };

  render() {
    return (
      <Card>
        <CardSection>
          <Input
            label="Username"
            value={this.state.username}
            onChangeText={username => this.setState({ username })}
          />
        </CardSection>

        <CardSection>
          <Input
            secureTextEntry
            label="Password"
            value={this.state.password}
            onChangeText={password => this.setState({ password })}
          />
        </CardSection>

        <CardSection>
          <Button onPress={() => Actions.homescreen()} >
            Log in
          </Button>
        </CardSection>

        <CardSection>
          <Button onPress={() => Actions.signup()} >
            New to vTrak? Sign Up!
          </Button>
        </CardSection>

      </Card>
    );
  }
}

export default LoginForm;
