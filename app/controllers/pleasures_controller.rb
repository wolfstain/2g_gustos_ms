class PleasuresController < ApplicationController
  before_action :set_pleasure, only: [:show, :update, :destroy]

  # GET /pleasures
  def index
    @pleasures = Pleasure.all

    render json: @pleasures
  end

  # GET /pleasures/1
  def show
    render json: @pleasure
  end

  # POST /pleasures
  def create
    @pleasure = Pleasure.new(pleasure_params)

    if @pleasure.save
      render json: @pleasure, status: :created, location: @pleasure
    else
      render json: @pleasure.errors, status: :unprocessable_entity
    end
  end

  # PATCH/PUT /pleasures/1
  def update
    if @pleasure.update(pleasure_params)
      render json: @pleasure
    else
      render json: @pleasure.errors, status: :unprocessable_entity
    end
  end

  # DELETE /pleasures/1
  def destroy
    @pleasure.destroy
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_pleasure
      @pleasure = Pleasure.find(params[:id])
    end

    # Only allow a trusted parameter "white list" through.
    def pleasure_params
      params.require(:pleasure).permit(:name, :subcategory_id, :user_id, :description)
    end
end
